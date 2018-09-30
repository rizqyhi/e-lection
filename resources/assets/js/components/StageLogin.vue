<template>
    <form class="login-form" @submit.prevent="submitLoginForm()">
        <div class="alert alert-info">Silakan login dengan menggunakan NIS dan kode akses yang telah diberikan.</div>
        <div class="alert alert-danger" v-if="errorMessage">{{ errorMessage }}</div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="NIS" v-model="voter.id">
        </div>
        <div class="form-group">
            <input type="text" class="form-control text-monospace" placeholder="*****" v-model="voter.access_code">
        </div>
        <button type="submit" class="btn btn-brand btn-block" :disabled="disableSubmitButton">
            <loading-icon v-if="isLoading"></loading-icon>
            <span v-else>Login</span>
        </button>
    </form>
</template>

<script>
export default {
    data () {
        return {
            voter: {id: '', access_code: ''},
            errorMessage: null,
            isLoading: false
        }
    },

    computed: {
        disableSubmitButton () {
            return this.isLoading
                || this.voter.id == ''
                || this.voter.access_code == ''
        },
    },

    methods: {
        submitLoginForm () {
            this.errorMessage = null
            this.isLoading = true

            axios.post('/api/voters/auth', this.voter)
                .then(response => {
                    let voter = response.data
                    window.localStorage.setItem('voter', JSON.stringify(voter))
                    this.isLoading = false
                    this.$emit('login', voter)
                })
                .catch(error => {
                    this.errorMessage = error.response.data.message
                    this.isLoading = false
                })
        }
    }
}
</script>

<style>
.login-form {
    width: 50%;
}
</style>

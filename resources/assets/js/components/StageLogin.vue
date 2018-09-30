<template>
    <div class="container-fluid" style="height: 100%">
        <div class="row d-flex align-items-center" style="height: 100%">
            <div class="col-md-4 d-flex align-items-center justify-content-center login-sidebar">
                <h2>E-Lection</h2>
            </div>
            <div class="col-md-8 d-flex justify-content-center">
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
            </div>
        </div>
    </div>
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
                    window.localStorage.setItem('voter', JSON.stringify(response.data))
                    this.isLoading = false
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
.login-sidebar {
    height: 100%;
    background: #8E2DE2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(60deg, #4A00E0, #8E2DE2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(60deg, #4A00E0, #8E2DE2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
}
.login-form {
    width: 50%;
}
</style>

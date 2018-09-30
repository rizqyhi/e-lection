<template>
    <div id="confirm">
        <div class="text-center">
            <p>Dengan ini saya, <strong>{{ voter.name }}</strong> memilih</p>
            <candidate v-bind="{candidate}" class="mx-auto text-left"></candidate>
            <p>sebagai Ketua OSIS SMA Foo periode 2018-2019.</p>
        </div>

        <div class="row py-3 mt-3" style="border-top: 1px solid rgba(0,0,0,0.09)">
            <div class="col-md-6">
                <button type="button" class="btn btn-outline-secondary" @click="backToVoteStage" :disabled="isLoading"><i class="ion-md-arrow-round-back"></i> Pilih kandidat lain</button>
            </div>
            <div class="col-md-6 ml-auto d-flex align-items-end">
                <button type="button" class="btn btn-success ml-auto" @click="saveVote" :disabled="isLoading">
                    <loading-icon v-if="isLoading"></loading-icon>
                    <span v-else>Selesaikan Pilihan <i class="ion-md-checkmark-circle-outline ml-3"></i></span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Candidate from './Candidate'

export default {
    components: { Candidate },

    props: {
        candidate: Object,
        voter: Object
    },

    data () {
        return {
            isLoading: false
        }
    },

    methods: {
        backToVoteStage () {
            this.$emit('back')
        },
        saveVote () {
            this.isLoading = true

            axios.post('/api/voters/vote', {
                voter_id: this.voter.id,
                candidate_id: this.candidate.id
            })
            .then(response => {
                this.$emit('save-confirm')
            })
        }
    }
}
</script>

<style>
#confirm {
    width: 90%
}
</style>

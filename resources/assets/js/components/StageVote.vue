<template>
    <div id="vote">
        <div class="row">
            <candidate
                v-for="candidate in candidates"
                :key="candidate.id"
                :candidate="candidate"
                :selected="selectedCandidate.id"
                @click="selectCandidate(candidate)"
            ></candidate>
        </div>

        <div class="row py-3 mt-3" style="border-top: 1px solid rgba(0,0,0,0.09)">
            <div class="col-md-6 ml-auto d-flex align-items-end">
                <button type="button" class="btn btn-success ml-auto" @click="confirmCandidate" :disabled="!selectedCandidate.id">Saya memilih <strong>{{ selectedCandidate.name }}</strong> <i class="ion-md-arrow-round-forward ml-3"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
import Candidate from './Candidate'

export default {
    components: { Candidate },

    props: {
        candidates: Array
    },

    data () {
        return {
            selectedCandidate: {id: null, name: ''}
        }
    },

    methods: {
        selectCandidate (candidate) {
            this.selectedCandidate = candidate
        },
        confirmCandidate () {
            this.$emit('select-candidate', this.selectedCandidate)
        }
    }
}
</script>

<style>
#vote {
    width: 90%
}
</style>

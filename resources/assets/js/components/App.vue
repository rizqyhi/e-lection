<template>
    <div id="app">
        <div class="container-fluid" style="height: 100%">
            <div class="row d-flex align-items-center" style="height: 100%">
                <div class="col-md-4 d-flex align-items-center justify-content-center sidebar">
                    <h2>E-Lection</h2>
                </div>
                <div class="col-md-8 d-flex justify-content-center">
                    <stage-login @login="goToVoteStage" v-if="isCurrentStage('login')"></stage-login>
                    <stage-vote :candidates="candidates" @select-candidate="goToConfirmStage" v-if="isCurrentStage('vote')"></stage-vote>
                    <stage-confirm v-bind="{voter, candidate}" @back="backToVoteStage" v-if="isCurrentStage('confirm')"></stage-confirm>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StageLogin from './StageLogin'
import StageVote from './StageVote'
import StageConfirm from './StageConfirm'

export default {
    components: { StageLogin, StageVote, StageConfirm },

    data () {
        return {
            currentStage: 'login',
            candidates: JSON.parse(window.candidates),
            voter: {},
            candidate: {}
        }
    },

    methods: {
        isCurrentStage (stage) {
            return stage === this.currentStage
        },
        goToVoteStage (voter) {
            this.voter = voter
            this.currentStage = 'vote'
        },
        goToConfirmStage (candidate) {
            this.candidate = candidate
            this.currentStage = 'confirm'
        },
        backToVoteStage () {
            this.currentStage = 'vote'
        }
    }
}
</script>

<style>
html, body, #app {
    height: 100%;
}

.sidebar {
    height: 100%;
    background: #8E2DE2;
    background: -webkit-linear-gradient(60deg, #4A00E0, #8E2DE2);
    background: linear-gradient(60deg, #4A00E0, #8E2DE2);
    color: #fff;
}
</style>

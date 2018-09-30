<template>
    <div id="app">
        <div class="container-fluid" style="height: 100%">
            <div class="row d-flex align-items-center" style="height: 100%">
                <div class="col-md-4 d-flex align-items-center justify-content-center sidebar">
                    <h2>E-Lection</h2>
                </div>
                <div class="col-md-8 d-flex justify-content-center">
                    <stage-login @login="goToVoteStage" v-if="isCurrentStage('login')"></stage-login>
                    <stage-vote :candidates="candidates" v-if="isCurrentStage('vote')"></stage-vote>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StageLogin from './StageLogin'
import StageVote from './StageVote'

export default {
    components: { StageLogin, StageVote },

    data () {
        return {
            currentStage: 'login',
            candidates: JSON.parse(window.candidates)
        }
    },

    methods: {
        isCurrentStage (stage) {
            return stage === this.currentStage
        },
        goToVoteStage (voter) {
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

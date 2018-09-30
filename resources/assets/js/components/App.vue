<template>
    <div id="app">
        <div class="container-fluid" style="height: 100%">
            <div class="row d-flex align-items-center" style="height: 100%">
                <div class="col-md-4 d-flex align-items-center justify-content-center sidebar">
                    <h2>E-Lection</h2>
                </div>
                <div class="col-md-8 d-flex justify-content-center">
                    <stage-login @login="goToVoteStage"></stage-login>
                    <stage-vote :candidates="candidates"></stage-vote>
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
            candidates: JSON.parse(window.candidates)
        }
    },

    methods: {
        goToVoteStage (voter) {
            console.log(voter)
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

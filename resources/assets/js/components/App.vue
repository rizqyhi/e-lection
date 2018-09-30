<template>
    <div id="app">
        <stage-login></stage-login>
    </div>
</template>

<script>
import StageLogin from './StageLogin'

export default {
    components: { StageLogin }
}
</script>

<style>
    html, body, #app {
        height: 100%;
    }
</style>

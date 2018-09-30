<template>
    <div class="col-md-6 mb-3">
        <div class="candidate card" :class="{selected: isSelected}" @click="$emit('click')">
            <div class="card-body d-flex align-items-center">
                <img :src="candidate.photo_url" class="candidate-photo">
                <div class="ml-3">
                    <span class="badge badge-primary badge-pill">{{ candidate.no }}</span>
                    <h5>{{ candidate.name }}</h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        candidate: Object,
        selected: String
    },

    computed: {
        isSelected () {
            return this.selected === this.candidate.id
        }
    }
}
</script>

<style lang="scss">
.candidate {
    border: none;
    box-shadow: 0 2px 6px rgba(#4A00E0, 0.05);
    transition: all 0.15s ease-out;

    &:hover {
        transform: translateY(-3px);
        box-shadow: 0 2px 50px rgba(#4A00E0, 0.05);
        cursor: pointer;
    }

    &.selected {
        background: linear-gradient(60deg, rgba(#4A00E0, 0.5), rgba(#8E2DE2, 0.5));
        color: #fff;
    }
}
.candidate-photo {
    width: 64px;
    height: auto;
    border-radius: 100%;
}
</style>

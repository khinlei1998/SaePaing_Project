<template>

    <div class="progress progress-profile">
        <div class="progress-bar bg-danger" role="progressbar" v-bind:style="{ width: percentage_start +'%'}"
             aria-valuenow="40"
             aria-valuemin="0" aria-valuemax="100">
            {{percentage_start}} %

        </div>

    </div>


</template>

<script>
    export default {
        name: "progressbar",

        props: ['per_from_server'],


        data() {
            var th_per = this;

            return {

                percentage_start: 0,
                end_percentage: localStorage.getItem('per_from_server'),
                percentage_t: 0,
                interval: 0

            }
        },
        methods: {
            toggleTimer() {
                if (this.end_percentage === this.percentage_start) {
                    console.log('progress stops');
                } else {
                    this.interval = setInterval(this.incrementTime, 100);
                    console.log(this.percentage_start);
                }
            },
            incrementTime() {

                if (this.percentage_start != this.end_percentage) {
                    this.percentage_start = parseInt(this.percentage_start) + 1;
                } else {
                    clearInterval(this.interval);
                }

            },
        },
        watch: {
            end_percentage: function (val) {
                this.toggleTimer();
            },
        },
        mounted() {
            this.toggleTimer();
        }


    }
</script>

<style scoped>

</style>
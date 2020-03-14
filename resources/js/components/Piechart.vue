<template>
    <div id="aa">

        <apexchart width="340" type="donut" :options="options" :series="series" ></apexchart>

    </div>
</template>

<script>
    import VueApexCharts from 'vue-apexcharts';

    Vue.component('apexchart', VueApexCharts);

    export default {
        name: "Piechart",

        props: ['project_per'],

        data() {
            var th=this;
            return {
                options: {


                    // colors:['#fa0000', '#E91E63', '#9C27B0'],

                    chart: {

                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800,
                            animateGradually: {
                                enabled: true,
                                delay: 150
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 350
                            }
                        },
                    },
                    labels: ['under 50%', 'over 50%','completed','Zero'],
                    plotOptions: {
                        pie: {
                            customScale: 1,
                            offsetX: 0,
                            offsetY: 0,
                            expandOnClick: true,
                            dataLabels: {
                                offset: 0,
                                minAngleToShowLabel: 10
                            },
                            donut: {
                                size: '50%',
                                background: 'white',
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontSize: '26px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        color: 'black',
                                        offsetY: -10
                                    },
                                    value: {
                                        show: true,
                                        fontSize: '26px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 400,
                                        color: 'black',
                                        offsetY: 16,
                                        formatter: function (val) {
                                            return val
                                        }
                                    },
                                    total: {
                                        show: true,
                                        showAlways: true,
                                        label: 'Percentage',
                                        fontSize: '11px',
                                        fontFamily: 'Helvetica, Arial, sans-serif',
                                        fontWeight: 600,
                                        color: '#373d3f',
                                        formatter: function (w) {
                                            return th.project_per[0]+'%'
                                        }
                                    }
                                }
                            },
                        }
                    },

                

                },

                series: [this.project_per[1],this.project_per[2],this.project_per[3],this.project_per[4]],
                msg:this.project_per[1]




            }
        }


    }




</script>

<style scoped>

</style>
<template>
    <div class="container-fornoti">
        <div class="row">
            <div class="box pt-2">
                <div class="notifications p-2">
                    <i class="fa fa-bell fa-lg y-index"></i>
                    <span class="num">{{noticount}}</span>

                    <div class="dropdown-menu shadow">
                        <a class="dropdown-item" href="#"><i class="fa fa-info-circle"></i> Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>

                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Realtimenoti",
        data() {
            return {
                noticount: 0
            }


        },

        watch: {},

        methods: {

            addafteramin: function () {


                 setInterval(() => {

                        axios.get('http://127.0.0.1:8000/getnoti').then(resp => {
                                console.log(resp.data.data.count);
                                this.noticount = 1;
                            },
                            error => {
                                console.log('error'),
                                    clearInterval(this.noticount)
                            }
                        );


                    }, 10000);


//             } else {
// //                 clearInterval(self.bb);
// // bugg
//             }


            },

            addnow:function(){
                axios.get('http://127.0.0.1:8000/getnoti').then(resp => {
                        console.log(resp.data.data.count);
                        this.noticount = resp.data.data.count;
                    },
                    error => {
                        console.log('error'),
                            clearInterval(this.noticount)
                    }
                );

            }
        },
        created: function () {
            // `this` points to the vm instance

            this.addafteramin();
            this.addnow();
            console.log(this.noticount)
        }

    }
</script>

<style scoped>

</style>
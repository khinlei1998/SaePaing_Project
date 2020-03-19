<template>
    <div class="container-fornoti">
        <div class="row">
            <div class="box pt-2">
                <div class="notifications p-2">
                    <i class="fa fa-bell fa-lg"></i>
                    <span class="num">{{noticount}}</span>

                    <div class="dropdown-menu shadow">
                        <div v-for="des in desc" :key="desc.id">
                        <a class="dropdown-item"  v-on:click="clickonlink(des.id)" href="#"><i class="fa fa-info-circle"></i> {{des.description}}</a>
                        <div class="dropdown-divider"></div>
                        </div>

                        <a class="dropdown-item"  href="#">Something else here</a>

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
                noticount: 0,
                desc:[]
            }
        },
        watch: {},
        methods: {

            addafteramin: function () {


                 setInterval(() => {

                        axios.get('http://127.0.0.1:8000/getnoti').then(resp => {
                                console.log(resp.data.data.count);
                                this.noticount = resp.data.data.count;
                                this.desc=resp.data.data.data;
                                console.log(resp.data.data)
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
                        this.desc=resp.data.data.data;
                        console.log(resp.data.data)


                    },
                    error => {
                        console.log('error'),
                            clearInterval(this.noticount)
                    }
                );

            },

            clickonlink:function(val){
                console.log('clicked');
                window.localStorage.setItem('cmp','Active');
                return window.location.assign(val);
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
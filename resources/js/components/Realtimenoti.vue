<template>
    <div class="container-fornoti">
        <div class="row">


            <div class="box pt-2">
                <div class="notifications p-2" type="button" data-toggle="dropdown">
                    <i class="fa fa-bell fa-lg"></i>

                    <span class="num">{{noticount}}</span>

                    <div class="dropdown-menu shadow">
                        <div class="uparrow"></div>
                        <div class="noticlick"><h5><i class="fa fa-bell fa-sm"></i>&emsp;{{noticount}} Notifications
                        </h5></div>
                        <div v-for="des in desc" :key="desc.id">

                            <a class="dropdown-item" v-on:click="readnoti(des.id)" href="#">
                                <p class="pt-2"><i class="fa fa-info-circle"></i>&nbsp;{{des.description}}</p>
                                <label class="pt-1 pl-2"> {{des.description}}</label>
                                <p class="time-noti"><i class="fa fa-clock"></i>&nbsp;20.10.2020/ 8:00 PM</p>
                            </a>
                            <div class="dropdown-divider"></div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</template>


<script>
    import log, {green, blue} from "console.pretty";

    export default {
        name: "Realtimenoti",

        data() {
            return {
                noticount: 0,
                desc: []
            }
        },
        watch: {},
        methods: {

            addafteramin: function () {


                setInterval(() => {

                    axios.get('http://localhost:8000/getnoti').then(resp => {
                            console.log(resp.data.data.count);
                            this.noticount = resp.data.data.count;
                            this.desc = resp.data.data.data;
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
            readnoti: function (val) {
                const options = {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                };
                axios.post('/readnoti', {
                    noti_id: val,
                },options)
                    .then(function (response) {
                      
                        if(response.data.link_name == 'current_link'){
                         return window.location.assign(window.location.href);
                         

                        }
                        else if(response.data.link_name == 'task'){
                         
                              window.localStorage.setItem('task', 'Active');

                                return window.location.assign('profile');
                        }
                        else{

                            window.localStorage.setItem('cmp', 'Active');

                            return window.location.assign(response.data.link_name);

                        }
                    })
                    .catch(function (error) {
                        log.red(error);
                    });

            },

            addnow: function () {

                axios.get('http://localhost:8000/getnoti').then(resp => {
                        console.log(resp.data.data.count);
                        this.noticount = resp.data.data.count;
                        this.desc = resp.data.data.data;
                        console.log(resp.data.data)


                    },
                    error => {
                        console.log('error'),
                            clearInterval(this.noticount)
                    }
                );

            },


        },
        created: function () {
            // `this` points to the vm instance
            log.blue('Start Pull Notification')
            this.addafteramin();
            this.addnow();
            console.log(this.noticount)
        }

    }
</script>

<style scoped>

</style>
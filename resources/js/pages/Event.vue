<template>
    <div class="row mb-3">
        <div class="col-5"></div>
        <div class="col-2 row">
            <router-link to="/event/add" class="btn btn-primary">Tambah Kegiatan</router-link>
        </div>
        <div class="col-5"></div>
    </div>
    <div class="row">
        <div class="col-12 my-1" v-for="event in events">
            <div class="card">
                <div class="card-body row">
                    <div class="col-2">
                        <img :src="event.image" class="card-image-list">
                    </div>
                    <div class="col-8">
                        <label>{{ event.title }} - {{ event.progress }}%</label>
                        <div class="progress">
                            <div v-if="event.progress == 100" class="progress-bar bg-success" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 75" class="progress-bar bg-primary" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 50" class="progress-bar bg-info" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 25" class="progress-bar bg-warning" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else class="progress-bar bg-danger" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-2">
                        <router-link :to="'/event/'+event.id" class="btn btn-primary me-1">Detail</router-link>
                        <button @click="delEvent(event.id)" class="btn btn-primary me-1">Hapus</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                events: []
            }
        },
        beforeCreate() {
            axios.get('/auth/check').then((res) => {
                if(res.data.auth){
                }else{
                    alert('login terlebih dahulu')
                    window.location.href = '/login'
                }
            })
        },
        created() {
            this.getEvents()
        },
        watch: {
            '$route' : 'getEvents'
        },
        methods: {
            getEvents() {
                axios.get('/events/get').then((res) => {
                    this.events = res.data.events
                }).catch((error) => {
                    console.log(error)
                })
            }, delEvent(id) {
                axios.get('/api/event/delete/'+id).then((res) => {
                    this.getEvents()
                    alert(res.data.alert)
                }).catch((error) => {
                    console.log(error)
                })
            }, addEvent() {
                axios.post('/api/event/add').then((res) => {
                    
                }).catch((error) => {
                    
                })
            }
        }
    }
</script>
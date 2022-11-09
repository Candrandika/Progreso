<template>
    <div>
        <div class="row">
            <div class="mt-3 col-6">
                <div class="card">
                    <img :src="event.image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-semibold">
                            {{ event.title }}
                        </h5>
                        <div class="card-text">
                            catatan :
                            <ul>
                                <li v-for="note in notes">( {{ note.date }} ) {{ note.note }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-6">
                <div class="card my-2">
                    <div class="card-body">
                        <label>Progress - {{ event.progress }}%</label>
                        <div class="progress">
                            <div v-if="event.progress == 100" class="progress-bar bg-success" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 75" class="progress-bar bg-primary" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 50" class="progress-bar bg-info" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="event.progress >= 25" class="progress-bar bg-warning" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else class="progress-bar bg-danger" role="progressbar" :style="'width: '+event.progress+'%'" :aria-valuenow="event.progress" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <label>Ubah Progress</label>
                        <div class="input-group mb-3">
                            <input type="number" min="0" max="100" class="form-control" v-model="event.progress" placeholder="Progress" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                        <button class="btn btn-primary" @click="updateProgress">Update Progress</button>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <label>Tambah Catatan</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" v-model="date">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="catatan" v-model="catatan">
                        </div>
                        <button class="btn btn-primary" @click="addNote">Tambah Catatan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                event: [],
                notes: [],
                progress: '',
                date: '',
                catatan: '',
            }
        },
        watch: {
            '$route' : ['getEvent']
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
            this.getEvent()
        },
        methods: {
            getEvent() {
                axios.get('/api/events/'+this.id).then((res) => {
                    this.event = res.data.event
                    this.notes = res.data.notes
                }).catch((error) => {
                    console.log(error)
                })
            }, updateProgress() {
                axios.post('/api/event/progress/'+this.id, {progress: this.event.progress}).then((res) => {
                    alert(res.data.alert)
                }).catch((error) => {
                    console.log(error)
                })
            }, addNote() {
                axios.post('/api/event/note/'+this.id, {date: this.date, note: this.catatan}).then((res) => {
                    this.getEvent()
                    alert(res.data.alert)
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>
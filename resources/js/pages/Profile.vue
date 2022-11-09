<template>
    <div class="row mt-3 ">
        <div class="col d-flex flex-column align-items-center">
            <h1 class="mb-3">Profile Anda</h1>
            <img :src="profile.image" alt="profile_image" class="rounded-circle my-2" style="height: 120px;">
            <p class="fw-bold mt-2 mb-0">{{ profile.name }}</p>
            <p>{{ profile.email }}</p>
            <div class="row mt-2" style="min-width:400px;">
                <div class="col d-flex flex-column btn border mx-2">
                    Kegiatan | {{ event.event }}
                </div>
                <div class="col d-flex flex-column btn border mx-2">
                    Selesai | {{ event.eventDone }}
                </div>
                <div class="col d-flex flex-column btn border mx-2">
                    Proses | {{ event.eventProgress }}
                </div>
            </div>
        </div>
    
        <div class="col row mt-3">
            <div class="col-2"></div>
            <div class="col-8">
                <h3>Ubah Profile</h3>
                <form action="/api/event/add" @submit.prevent="editEvent" method="get" class="my-4">
                    <label for="title">Nama</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" v-model="profile.name">
                    </div>
                    <label for="title">Email</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" v-model="profile.email">
                    </div>
                    <label for="title">Foto</label>
                    <div class="input-group mb-2">
                        <input type="file" class="form-control" @change="editImage" >
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                profile: [],
                event: [],
                image: []
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

            axios.get('/profile/get').then((res) => {
                this.profile = res.data.profile
            }).catch((error) => {
                console.log(error)
            })

            axios.get('/event/get').then((res) => {
                this.event = res.data
            }).catch((error) => {
                console.log(error)
            })
        },
        methods: {
            editEvent() {
                axios.post('/api/profile/'+this.profile.id, this.profile).then((res) => {
                    if(this.image.length != 0){
                        const imageFile = new FormData()
                        imageFile.append('file', this.image)

                        axios.post('/api/profile/'+this.profile.id, imageFile).then((res) => {

                        }).catch((error) => {
                            console.log(error)
                        })
                    }
                    // this.getProfile()
                    alert('Data telah berhasil dirubah')
                    window.location.href = '/profile'
                }).catch((error) => {
                    console.log(error)
                })
            },
            editImage(event) {
                this.image = event.target.files[0]
            },
            getProfile() {
                axios.get('/profile/get').then((res) => {
                    this.profile = res.data.profile
                }).catch((error) => {
                    console.log(error)
                }) 
            }
        }
    }
</script>

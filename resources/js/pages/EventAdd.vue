<template>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h1 class="text-center my-3">Tambah Kegiatan</h1>
            <form action="/api/event/add" @submit.prevent="addEvent" method="get">
                <label for="title">Nama Kegiatan</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" v-model="form.title">
                </div>
                <label for="title">Foto</label>
                <div class="input-group mb-2">
                    <input type="file" class="form-control" name="image" v-on:change="handleImage">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</template>

<script>
    export default {
        http: {
            headers: {
                'X-CSRF-Token': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
            }
        },
        data() {
            return {
                form: {
                    title: '',
                },
                image: [],
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
        }, mounted() {
        },methods: {
            addEvent() {
                const imageData = new FormData()
                imageData.append('image', this.image)

                axios.post('/event/add', this.form).then((res) => {
                    axios.post('/api/event/add/'+res.data.id, imageData).then((res) => {
                        this.$router.push('/event')
                    }).catch((error) => {
                        console.log(error)
                    })
                }).catch((error) => {
                    console.log(error)
                })
            }, handleImage(event) {
                this.image = event.target.files[0]
            }
        }
    }
</script>
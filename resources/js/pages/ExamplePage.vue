<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-2">
                            <img src="/assets/media/tes/bg.jpg" class="card-image-list">
                        </div>
                        <div class="col-8">
                            <label>Membaca Buku "Kutu Buku" - {{ progress }}%</label>
                            <div class="progress">
                                <div v-if="progress == 100" class="progress-bar bg-success" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                                <div v-else-if="progress >= 75" class="progress-bar bg-primary" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                                <div v-else-if="progress >= 50" class="progress-bar bg-info" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                                <div v-else-if="progress >= 25" class="progress-bar bg-warning" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                                <div v-else class="progress-bar bg-danger" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-2">
                            <router-link to="/example" class="btn btn-primary me-1">Detail</router-link>
                            <router-link to="/example" class="btn btn-primary me-1">Hapus</router-link>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="mt-3 col-6">
                <div class="card">
                    <img src="/assets/media/tes/bg.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-semibold">
                            Membaca Buku "Kutu Buku"
                        </h5>
                        <div class="card-text">
                            catatan :
                            <ul>
                                <li>09/09/2020 - Membaca sampai halaman 101</li>
                                <li>10/09/2020 - Membaca sampai halaman 135</li>
                                <li>11/09/2020 - Membaca sampai halaman 172</li>
                                <li>12/09/2020 - Membaca sampai halaman 200</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 col-6">
                <div class="card my-2">
                    <div class="card-body">
                        <label>Progress - {{ progress }}%</label>
                        <div class="progress">
                            <div v-if="progress == 100" class="progress-bar bg-success" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="progress >= 75" class="progress-bar bg-primary" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="progress >= 50" class="progress-bar bg-info" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else-if="progress >= 25" class="progress-bar bg-warning" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                            <div v-else class="progress-bar bg-danger" role="progressbar" :style="'width: '+progress+'%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <label>Ubah Progress</label>
                        <div class="input-group mb-3">
                            <input type="number" v-model="progress" min="1" max="100" class="form-control" placeholder="Progress" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                        <button class="btn btn-primary" @click="alertProgress">Update Progress</button>
                    </div>
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <label>Tambah Catatan</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" placeholder="catatan"></textarea>
                        </div>
                        <button class="btn btn-primary" @click="alertNote">Tambah Catatan</button>
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
                progress: 25
            }
        },
        methods: {
            alertProgress() {
                alert('Progres di update menjadi '+this.progress+'%')
            },
            alertNote() {
                alert('Catatan berhasil ditambahkan')
            }
        }
    }
</script>
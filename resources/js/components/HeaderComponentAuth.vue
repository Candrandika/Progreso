<template>
  <header class="border-bottom sticky-top bg-light">
    <div
      class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0">
      <router-link to="/"
        class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none h3 fw-semibold">
        Progreso
      </router-link>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><router-link to="/" class="nav-link px-2 link-secondary">Home</router-link></li>
        <li><router-link to="/event" class="nav-link px-2 link-secondary">Kegiatan</router-link></li>
        <li><router-link to="/example" class="nav-link px-2 link-secondary">Contoh</router-link></li>
        <li><router-link to="/about" class="nav-link px-2 link-secondary">Tentang</router-link></li>
      </ul>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img :src="profile.image" alt="profile_image" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
          <li><router-link class="dropdown-item fw-semibold" to="/profile">{{ profile.name }}</router-link></li>
          <li><router-link class="dropdown-item" to="/profile">{{ profile.email }}</router-link></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="/logout">Sign out</a></li>
        </ul>
      </div>
    </div>
  </header>
</template>

<script>
  export default {
    data() {
      return {
        profile: []
      }
    },
    beforeCreate() {
      axios.get('/profile/get').then((res) => {
        this.profile = res.data.profile
      }).catch((error) => {
        console.log(error)
      })
    }
  }
</script>
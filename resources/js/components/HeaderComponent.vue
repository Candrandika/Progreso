<template>
    <header class="border-bottom sticky-top bg-light">
        <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0">
            <router-link to="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none h3 fw-semibold">
                Progreso
            </router-link>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><router-link to="/" class="nav-link px-2 link-secondary">Home</router-link></li>
                <li><router-link to="/event" class="nav-link px-2 link-secondary">Kegiatan</router-link></li>
                <li><router-link to="/example" class="nav-link px-2 link-secondary">Contoh</router-link></li>
                <li><router-link to="/about" class="nav-link px-2 link-secondary">Tentang</router-link></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/login" class="btn btn-outline-primary me-2">Login</a>
                <a href="/register" class="btn btn-primary">Sign-up</a>
            </div>
        </div>
    </header>
</template>
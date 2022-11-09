<template>
    <div class="col-1"></div>
    <div class="col-4">
        <h1>Progreso</h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa dolor neque perspiciatis asperiores exercitationem fugiat. A nam totam officia porro.</p>
        <a href="/register" class="btn btn-primary">Mulai Sekarang!</a>
    </div>
    
</template>

<script>
    export default {
        beforeCreate() {
            var el = document.getElementById('content')
            el.classList.add('bg-image')
            el.classList.add('d-flex')
            el.classList.add('align-items-center')
        }, 
        beforeUnmount() {
            var el = document.getElementById('content')
            el.className = 'content'
        }
    }
</script>
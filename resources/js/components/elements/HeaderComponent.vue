<template>
    <nav class="navbar navbar-expand-lg container-header">
        <div class="wrapped-header row justify-content-between flex-row w-100">
            <div class="wrap-left w-auto">
                <div class="div-logo">
                    <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
                </div>
            </div>
            <div class="wrap-mid flex-row w-auto">
                <div class="div-menu flex-row">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-row">
                        <li class="nav-item active">
                            <a class="menu-item active-menu" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item" href="/catalog">Katalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item" href="/about">Tentang INDI</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu-item" href="/reviews">Testimoni</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wrap-right w-auto">
                <div class="div-login">
                    <button class="btn-login">Log in</button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mou')
        },

    }
</script>

<style scoped>
    .container-header{
        height: 80px;
        padding: 0 20px;
        background-color: #fff;
    }

    .wrapped-header{
        display: flex;
    }

    .menu-item{
        display: block;
        padding: 0.5rem 1rem;
        padding-right: 1rem;
        padding-left: 1rem;
        color: #000;
        text-decoration: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }

    .active-menu{
        font-weight: 700;
    }

    .btn-login{
        background: transparent;
        border: 3px solid #000;
        width: 120px;
        height: 40px;
        font-weight: 700;
    }
</style>
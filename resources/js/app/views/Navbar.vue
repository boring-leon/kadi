<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/">Kadi</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
      >
    <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              {{ appUser.name}}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" v-if='appUser.isAdmin' :href='adminRoute'>
                panel administratora
              </a>
              <router-link class="dropdown-item" :to="{name: 'UserIngredients'}">
                moje składniki
              </router-link>
              <router-link class="dropdown-item" :to="{name: 'UserMeals'}">
                moje posiłki
              </router-link>
              <router-link class="dropdown-item" :to="{name: 'UserAccount'}">
                moje konto
              </router-link>
              <router-link class="dropdown-item" :to="{name: 'tutorial'}">
                poradnik
              </router-link>
              <router-link class="dropdown-item" :to="{name: 'support'}">
                wsparcie
              </router-link>
              <a class="dropdown-item" href="/logout">wyloguj się</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  computed: {
    adminRoute(){
      return baseState.admin_route;
    }
  }
};
</script>


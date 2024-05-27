<template>
  <header>
    <div class="container">
      <nav>
        <router-link to="/">
          <picture>
            <img src="@/assets/tradeup.png" alt="Imagem Ilustrativa" class="logo">
          </picture>
        </router-link>
        <ul class="nav-links">
          <li>
            <router-link to="/" class="nav-item">
              Home
            </router-link>
          </li>
          <li>
            <router-link to="/findcep" class="nav-item">
              Buscar Cep
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: "TheHeader"
};
</script>

<style scoped>
header {
  background: #333;
  color: white;
  padding: 10px 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.container {
  box-sizing: border-box;
  max-width: 1200px;
  padding: 0 20px;
  margin: 0 auto;
}

.logo {
  width: 150px;
}

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 20px;
}

.nav-item {
  color: white;
  text-decoration: none;
  font-size: 16px;
  padding: 10px 15px;
  border-radius: 5px;
  transition: background 0.3s, color 0.3s;
}

.nav-item:hover {
  background: #555;
  color: #fff;
}

.nav-item.router-link-exact-active {
  background: #007bff;
  color: white;
}
</style>

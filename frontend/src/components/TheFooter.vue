<template>
  <footer>
    <div class="container">
      <p>Via CEP. Alguns direitos reservados.</p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "TheFooter"
};
</script>

<style scoped>
footer {
  background: #333;
  padding: 20px 0;
  color: #fff;
  text-align: center;
  border-top: 4px solid #87f;
}

.container {
  max-width: 1200px;
  padding: 0 20px;
  margin: 0 auto;
  box-sizing: border-box;
}

.container p {
  margin: 0;
  font-size: 1rem;
  line-height: 1.5;
  color: #ddd;
}

footer p::before {
  content: "© ";
}
</style>

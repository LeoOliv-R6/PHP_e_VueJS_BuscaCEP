<template>
    <div class="container">
        <FormCep/>
            
    </div>
</template>

<script>
import FormCep from "@/components/FormCep.vue"

export default {
  name: "FindCep",
  components: {
    FormCep
  }
};
</script>

<style scoped>
.container{
  box-sizing: border-box;
    max-width: 1200px;
    padding: 0 20px;
    margin: 0 auto;
    
}
picture img{
    width: 500px;
}
</style>
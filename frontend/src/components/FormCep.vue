<template>
  <div class="container">
    <h2>Informações do CEP buscado</h2>
    <img id="pic" src="@/assets/imagem-cidade.jpg" alt="cidade">
    <form id="contactForm" @submit.prevent="consultarCEP" class="form">
      <div class="form-input">
        <label for="cep">CEP:</label>
        <input
          placeholder="Digite um CEP aqui (ex: 12345-678)"
          type="text"
          id="cep"
          v-model="cep"
          @input="formatarCEP"
          @blur="validarCEP"
          @keydown="permitirSomenteNumeros"
          required
        />
        <span v-if="erroCEP" class="erro">{{ erroCEP }}</span>
      </div>
      <button type="submit" class="btn">
        Buscar
      </button>
    </form>
    <table class="table" v-if="resultado">
      <thead>
        <tr>
          <th>CEP</th>
          <th>Logradouro</th>
          <th>Complemento</th>
          <th>Bairro</th>
          <th>Localidade</th>
          <th>UF</th>
          <th>IBGE</th>
          <th>GIA</th>
          <th>DDD</th>
          <th>SIAFI</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ resultado.cep }}</td>
          <td>{{ resultado.logradouro }}</td>
          <td>{{ resultado.complemento }}</td>
          <td>{{ resultado.bairro }}</td>
          <td>{{ resultado.localidade }}</td>
          <td>{{ resultado.uf }}</td>
          <td>{{ resultado.ibge }}</td>
          <td>{{ resultado.gia }}</td>
          <td>{{ resultado.ddd }}</td>
          <td>{{ resultado.siafi }}</td>
        </tr>
      </tbody>
    </table>
    <div v-if="erro" class="erro">
      <p>{{ erro }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "FormCep",
  data() {
    return {
      cep: "",
      resultado: null,
      erro: "",
      erroCEP: "",
    };
  },
  methods: {
    consultarCEP() {
      if (this.erroCEP) return;
      console.log(`Buscando dados para o CEP: ${this.cep}`);
      fetch(`http://localhost/TesteTradeup/backend/index.php?cep=${this.cep}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error("Erro ao buscar o CEP");
          }
          return response.json();
        })
        .then((data) => {
          console.log("Dados recebidos:", data);
          if (data.erro) {
            this.resultado = null;
            this.erro = data.erro;
          } else {
            this.resultado = data;
            this.erro = "";
          }
        })
        .catch((error) => {
          console.error("Erro na requisição:", error);
          this.resultado = null;
          this.erro = `Erro: ${error.message}`;
        });
    },
    formatarCEP() {
      let cep = this.cep.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
      if (cep.length > 5) {
        cep = cep.slice(0, 5) + "-" + cep.slice(5, 8); // Adiciona o hífen após os primeiros 5 dígitos
      }
      this.cep = cep;
    },
    validarCEP() {
      const cepRegex = /^\d{5}-\d{3}$/;
      if (!cepRegex.test(this.cep)) {
        this.erroCEP = "CEP inválido. Formato correto: XXXXX-XXX";
      } else {
        this.erroCEP = "";
      }
    },
    permitirSomenteNumeros(event) {
      const key = event.key;
      if (!/[0-9]/.test(key) && key !== "Backspace" && key !== "-") {
        event.preventDefault();
      }
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 10px;
}
#pic {
  max-width: 100%;
  height: auto;
  margin-bottom: 20px;
  border-radius: 10px;
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
}

.form-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-bottom: 10px;
}

label {
  margin-bottom: 5px;
}

.input {
  padding: 8px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
}

.btn {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #0056b3;
}

.table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ccc;
  margin-bottom: 20px;
  background-color: #fff;
}

.table th,
.table td {
  padding: 10px;
  text-align: left;
  border: 1px solid #ccc;
}

.erro {
  color: red;
  font-size: 14px;
  margin-top: 5px;
}

</style>

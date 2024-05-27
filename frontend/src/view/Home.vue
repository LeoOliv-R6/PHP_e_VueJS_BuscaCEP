<template>
    <section class="sobre">
      <h1>Sobre</h1>
      <img src="@/assets/predios.jpg" alt="predios">
      <div class="align">
        A TradeUp é uma empresa que se destaca no mercado pela sua abordagem inovadora e comprometimento com a excelência. Com uma equipe de profissionais altamente qualificados e uma visão estratégica focada em resultados, a TradeUp tem se consolidado como uma referência em soluções personalizadas para seus clientes. A empresa não apenas entrega serviços de alta qualidade, mas também se preocupa em manter um relacionamento próximo e transparente, garantindo a satisfação e a confiança de todos os seus parceiros de negócios.
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: "HomePage"
  };
  </script>
  
  <style scoped>
  .sobre {
    text-align: center;
    padding: 20px;
  }
  
  .sobre h1 {
    font-size: 2rem;
    margin-bottom: 20px;
  }
  
  .sobre img {
    width: 100%;
    max-width: 800px;
    height: auto;
    margin-bottom: 20px;
    border-radius: 10px;
  }
  
  .align {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: justify;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 3px solid rgba(85, 85, 85, 1);
    border-radius: 10px;
    background-color: #f9f9f9;
  }
  
  .align p {
    margin: 0;
  }
  </style>
  
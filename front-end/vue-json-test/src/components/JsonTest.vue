<template>
  <h1>Hello World</h1>
  <ul>
    <li v-for="(todoElem, index) in todoList" :key="index">
      {{ todoElem.text }}
    </li>
  </ul>
  <form @submit="formSubmit">
    <input type="text" name="newTodo" v-model="newTodo">
    <input type="submit" value="CREATE">
  </form> <!-- form submit lo usiamo per attaccare un metodo per poter usare axios -->
</template>

<script>

import axios from 'axios';  /* ricordati di installare axios con npm install axios da terminale */

const API_URL = "http://localhost/";

export default {
  name: "JsonTest",
  data() {
    return {
      newTodo: "",
      todoList: []
    };
  },
  methods: {
    formSubmit(e) {
      e.preventDefault(); /* serve a evitare che il form ricarichi la pagina */
      const params = {
        params: {
          "newTodo": this.newTodo
        }
      };
      axios.get(API_URL + "api-add-todo.php", params)
        .then(() => {
          this.getAllData();
        })
    },
    getAllData() {
      axios.get(API_URL + "api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data; /* con questa riga e riga 15 salviamo i dati dell'api in questo file */
        });
    }
  },
  mounted() {
    this.getAllData();
  }
}
</script>

<style scoped>

</style>

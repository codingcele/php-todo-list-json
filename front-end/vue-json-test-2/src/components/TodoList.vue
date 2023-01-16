<template>
  <div>
    <h1>
      Hello World
    </h1>
    <ul>
      <li v-for="(todoElem, index) in todoList" :key="index">
        {{ todoElem.text }}
      </li>
    </ul>
    <form @submit="addNewTask">
      <input type="text" name="newTodo" v-model="newTodoText">
      <input type="submit" value="CREATE NEW TASK">
    </form> <!-- form submit lo usiamo per attaccare un metodo per poter usare axios -->
  </div>
</template>

<script>

import axios from "axios"; /* ricordati di installare axios */

const API_URL = "http://localhost/";

export default {
  name: "TodoList",
  data() {
    return {
      todoList: [],
    };
  },
  methods: {
    getAllData() {
      axios.get(API_URL + "altra-api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    },
    addNewTask(e) {
      e.preventDefault();

      const newTodoText = this.newTodoText;

      const params = {
        params: {
          "text": newTodoText
        }
      };

      axios.get(API_URL + "api-add-new-task.php", params)
        .then(() => {
          this.newTodoText = "";
          this.getAllData();
        });
    }
  },
  mounted() {
    this.getAllData();
  }
}
</script>

<style>

</style>

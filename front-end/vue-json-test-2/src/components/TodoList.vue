<template>
  <div>
    <h1>
      Todo List
    </h1>
    <ul>
      <li v-for="(todoElem, index) in todoList" :key="index">
        <span class="text" :class="{ strike: todoElem.completed }" @click="change(index)"> {{ todoElem.text }} </span>
        <span></span>
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
    },
    change(index) {
      this.todoList[index].completed = !this.todoList[index].completed;
    }
  },
  mounted() {
    this.getAllData();
  }
}
</script>

<style>
.text {
  cursor: pointer;
}

.strike {
  text-decoration: line-through;
}
</style>

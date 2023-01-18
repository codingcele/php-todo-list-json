<template>
  <div>
    <h1>
      Todo List
    </h1>
    <form @submit="addNewTask">
      <input type="text" name="newTodo" v-model="newTodoText">
      <input type="submit" value="CREATE NEW TASK">
    </form> <!-- @submit lo usiamo per attaccare un metodo per poter usare axios -->
    <ul>
      <li v-for="(todoElem, index) in todoList" :key="index" class="listElem">
        <div class="container">
          <div class="text" :class="{ strike: todoElem.completed }" @click="completeTask(index)">
            {{ todoElem.text }}
          </div>
          <div>
            <font-awesome-icon class="icon" @click="deleteTask(index)" icon="fa-solid fa-x" />
          </div>
        </div>
      </li>
    </ul>
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
    completeTask(index) {
      console.log(index);

      const text = this.todoList[index].text;
      console.log(text);

      const completed = !this.todoList[index].completed;
      console.log(completed);

      const params = {
        params: {
          "index": index,
          "text": text,
          "completed": completed
        }
      };

      axios.get(API_URL + "api-complete-task.php", params)
        .then(res => {

          const data = res.data;

          if (data == true) {
            this.getAllData();
          }
        });
    },
    deleteTask(index) {

      const params = {
        params: {
          "index": index,
        }
      };

      axios.get(API_URL + "api-delete-task.php", params)
        .then(res => {
          const data = res.data;

          if (data == true) {
            this.getAllData();
          }
        });
    },
  },
  mounted() {
    this.getAllData();
  }
}


</script>

<style>
.listElem {
  margin: 10px 0;
}

.text {
  cursor: pointer;
  min-width: 250px;
  margin-right: 50px;
}

.strike {
  text-decoration: line-through;
}

.container {
  display: flex;
}

.icon {
  color: black;
  cursor: pointer;
}

ul {
  list-style-type: none;
}
</style>

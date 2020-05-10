<template>
        <div id="posts">
            <p class="border p-3" v-for="post in posts">
                {{ post.title }}
                <router-link :to="{ name: 'update', params: { postId : post.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
                <button
                    type="button"
                    @click="deletePost(post.id)"
                    class="p-1 mx-3 float-right btn btn-danger"
                >
                    Delete
                </button>
            </p>
            <div>
                <button
                    v-if="next"
                    type="button"
                    @click="navigate(next)"
                    class="m-3 btn btn-primary"
                >
                  Next
                </button>
                <button
                    v-if="prev"
                    type="button"
                    @click="navigate(prev)"
                    class="m-3 btn btn-primary"
                >
                  Previous
                </button>
            </div>
        </div>
    </template>


    <script>
        export default {
          mounted() {
            this.getPosts();
          },
          data() {
            return {
              posts: {},
              next: null,
              prev: null
            };
          },
          methods: {
            getPosts(address) {
              axios.get(address ? address : "/api/posts").then(response => {
                this.posts = response.data.data;
                this.prev = response.data.links.prev;
                this.next = response.data.links.next;
              });
            },
            deletePost(id) {
              axios.delete("/api/posts/" + id).then(response => this.getPosts())
            },
            navigate(address) {
              this.getPosts(address)
            }
          }
        };
        </script>

<style scoped>
      @import url(https://fonts.googleapis.com/css?family=Dosis:300|Lato:300,400,600,700|Roboto+Condensed:300,700|Open+Sans+Condensed:300,600|Open+Sans:400,300,600,700|Maven+Pro:400,700);
      @import url("https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css");
      * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }
      header {
        color: #d3d3d3;
      }
      nav {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 82%;
        left: 0;
        padding: 22px;
        border-right: 2px solid #161e23;
      }
      nav > header {
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
      }
      nav section {
        font-weight: 600;
      }
      nav section header {
        padding-top: 30px;
      }
      nav section ul {
        list-style: none;
        padding: 0px;
      }
      nav section ul a {
        color: white;
        text-decoration: none;
        font-weight: bold;
      }
      article {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 18%;
        overflow: auto;
        border-left: 2px solid #2a3843;
        padding: 20px;
      }
      article > header {
        height: 60px;
        border-bottom: 1px solid #2a3843;
      }
    </style>

<template>
  <div>
          <div class="container">
            <h2>Articles</h2>
 <form @submit.prevent="addArticle()" class="mb-3" >
    <div class="form-group">
         <input type="text" name="title" class="form-control" placeholder="Title" v-model="article.title">
    </div>
    <div class="form-group">
        <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Body"  v-model="article.body">
            </textarea>
    </div>

    <button type="button" class="btn btn-success" @click="addArticle(article.id)">Save</button>
 </form>


            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li :class="[{disabled:!pagination.prev_page_url }]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)"> Previous</a></li>
                <li class="page-item"><a class="page-link text-dark" href="#">Page {{pagination.current_page }} of {{pagination.last_page }} </a></li>
                <li :class="[{disabled:!pagination.next_page_url }]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a></li>
            </ul>
            </nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="article in articles" :key="article.id">
      <td>{{article.title}}</td>
      <td>{{ article.body}}</td>
      <td><button class="btn btn-info mb-2" @click="editArticle(article)">Edit</button></td>
      <td><button class="btn btn-danger" @click="deleteArticle(article.id)">Delete</button></td>
    </tr>
    
  </tbody>
</table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            articles: [],
            article:{
                id: '',
                title: '',
                body: '',
                article_id: ''
            },
            pagination: {},
            edit: false
        } // END OF DATA RETURN
    }, // END OF DATA
        created(){
            this.fetchArticles();
        }, // END OF CREATED

        methods:{
            fetchArticles(page_url){
                let vm = this;
                page_url = page_url || 'api/articles'
                fetch(page_url)
                .then(res=>res.json())
                .then(res=>{
                    // console.log(res.data);
                    this.articles = res.data;
                    console.log(this.articles);
                    vm.makePagination(res.meta,res.links)
                })
                .catch( err=> console.log(err));
            },
            makePagination(meta,links){
                let pagination = {
                     current_page : meta.current_page,
                     last_page : meta.last_page,
                     next_page_url : links.next,
                     prev_page_url : links.prev
                }
                this.pagination = pagination;
            },
            addArticle(){
                if(this.edit === false){
                    fetch('api/article',{
                        method: 'post',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }

                    }).then(res => res.json())
                    .then(data=>{
                        this.article.title = '';
                        this.article.body = '';
                        this.article.article_id = '';
                        alert('added');
                        this.fetchArticles(`api/articles?page=${this.pagination.current_page}`);

                    })
                     .catch(err=> console.log(err));
                }else{
                    fetch('api/article',{
                        method: 'put',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }

                    }).then(res => res.json())
                    .then(data=>{
                        this.article.title = '';
                        this.article.body = '';
                        this.article.article_id = '';
                        alert('updated');
                        this.fetchArticles(`api/articles?page=${this.pagination.current_page}`);
                        this.edit = false;

                    })
                     .catch(err=> console.log(err));
                }
            },
            deleteArticle(id){
                if(confirm('Are You Sure?')){

                    fetch(`api/article/${id}`, {
                        method: 'delete'
                    })
                    .then(res=>res.json())
                    .then( data=> {
                        alert('article removed');
                        this.fetchArticles(`api/articles?page=${this.pagination.current_page}`);
                    })
                    .catch(err=> console.log(err));

                }
            },
            editArticle(article){
                this.edit = true;
                this.article.id = article.id;
                this.article.article_id = article.id;
                this.article.title = article.title;
                this.article.body = article.body;
                console.log(JSON.stringify(this.article));
            }
        } // END OF METHODS
}// END OF EXPORT 
</script>
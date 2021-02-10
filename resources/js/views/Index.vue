<template>
    <div>
        <div class="container">
            <quote 
            v-for="quote in paginated" 
            :author="quote.author"
            :content="quote.content"
            :date="quote.created_at"
            :tags="quote.tags"
            :key="quote.id"
            />
        </div>
        <div class="v-paginate">
        	<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item"><button @click="prevPage" class="page-link" :disabled="pageNumber==1">&laquo;</button></li>
			    <li class="page-item"><button @click="nextPage" class="page-link" :disabled="pageNumber>=pages">&raquo;</button></li>
			  </ul>
			</nav>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Quote from "../components/Quote";

    export default {
    	components: {
            Quote
        },
    	data: () => ({
            quotes: [],
            pageNumber: 1,
            perPage: 10
        }),
    	mounted() {
    		this.loadQuotes();
    	},
    	methods: {
    		loadQuotes() {
    			axios.get('/api/quotes')
    			.then(res => {
                    console.log(res.data);
                    this.quotes = res.data;
    			})
    		},
            pageClick(page) {
                this.pageNumber = page;
            },
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            }
    	},
        computed: {
            pages() {
                return Math.ceil(this.quotes.length / this.perPage);
            },
            paginated() {
                let from = (this.pageNumber - 1) * this.perPage;
                let to = from + this.perPage;
                return this.quotes.slice(from, to);
            }
        }
    }
</script>

<style scoped>
    .v-paginate {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        cursor: pointer;
    }
    .v-paginate span {
        padding: 2px 8px;
        background-color: #bbb8b8;
        margin: 0 10px;
        border: solid 1px black;
    }
    .v-paginate span:hover {
        background-color: #f2f0f0;
    }
</style>

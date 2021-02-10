<template>
    <div>
        <div class="container">
            <div class="row mt-4 mb-5">
                <div class="col-sm-6 mx-auto">
                    <form>
                      <div class="mb-3">
                        <label for="author" class="form-label">Автор</label>
                        <input type="text" v-model="form.author" class="form-control" id="author" maxlength="15" placeholder="Автор">
                      </div>
                      <div class="mb-3">
                        <label for="conent" class="form-label">Цитата</label>
                        <textarea v-model="form.content" class="form-control" id="conent" maxlength="2000" placeholder="Цитата"></textarea>
                      </div>
                      <div class="mb-3">
                          <v-select
                            multiple
                            placeholder="до 3 тегов"
                            label="title"
                            v-model="form.tags"
                            :options="tags"
                            :selectable="() => form.tags.length < 3"
                          />
                      </div>
                      <button class="btn btn-primary" @click="store">Опубликовать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
      import axios from 'axios';
      export default {
        components: {},
        data: () => ({
            form: {
                content: "",
                author: "",
                tags: []
            },
            tags: []
        }),
        mounted() {
            this.loadTags();
        },
        methods: {
            store() {
                this.loading = true;
                axios.post('/api/quotes', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
            },
            loadTags() {
                axios.get('/api/quotes/create')
                .then(res => {
                    this.tags = res.data;
                    console.log(this.tags);
                })
            }

        }
    }
</script>

<style scoped>

</style>

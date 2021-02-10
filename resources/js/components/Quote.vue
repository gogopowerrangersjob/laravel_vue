<template>
	<div class="container">
		<div class="row mb-5 mt-5">
			<div class="col-sm-6 mx-auto">
				<figure class="text-end border border-3 p-3">
				  <blockquote class="blockquote">
				    <p>{{ content }}</p>
				  </blockquote>
				  <figcaption class="blockquote-footer">
				    By {{ author }} On {{ date }}
				    <div class="tags" v-for="tag in tags">
				    	<span class="tag">{{ tag.title }}</span>
				    </div>
				  </figcaption>
				</figure>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			tags: {
				type:Array,
				default: []
			},
			author: {
				type: String,
				default: "NULL"
			},
			content: {
				type: String,
				default: "NULL"
			},
			date: {
				type: String,
				default: "NULL"
			}
		}
	}
</script>

<style scoped>
	.tags {
		display: inline-flex;
	}
	.tag {
	    background-color: grey;
	    color: white;
	    padding: 3px;
	    margin: 4px;
	    border-radius: 5px;
	}
</style>
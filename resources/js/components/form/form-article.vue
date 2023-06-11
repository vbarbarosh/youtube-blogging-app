<template>
    <div>
        <input-text v-model="value.title" label="Title" />
        <input-textarea v-model="value.body" label="Body" />
        <input-checkbox v-model="value.is_published" label="Publish" />
    </div>
</template>

<script>
    const form_article = {
        props: ['value'],
    };

    export default form_article;
</script>

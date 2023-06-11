<template>
    <div>
        <input-text v-model="value.title" label="Title" />
        <input-textarea v-model="value.body" label="Body" />
    </div>
</template>

<script>
    const form_article = {
        props: ['value'],
    };

    export default form_article;
</script>

<template>
    <div class="flex w-full border-b border-gray-800">
        <component
            :is="`AppNotification${notification.type}`"
            :notification="notification"
        />
    </div>
</template>

<script>
export default {
    name: "AppNotification",
    props: {
        notification: {
            required: true,
            type: Object,
        },
    },
};
</script>

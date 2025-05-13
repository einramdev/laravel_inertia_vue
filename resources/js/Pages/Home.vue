<script setup>
import PaginationsLinks from './Components/PaginationsLinks.vue';

defineProps({
    users: Object
});

// Format date
const getDate = (date) => 
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>

    <Head :title="` | ${$page.component}`"></Head>

    <div>
        <table class="w-full text-sm text-left rounded-md shadow-lg overflow-hidden mb-6 table-auto bg-white">
            <thead class="text-xs uppercase font-medium border-b border-slate-100 text">
                <tr class="bg-slate-300">
                    <th class="px-6 py-4">Avatar</th>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Registration Date</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users.data" :key="user.id" class="hover:bg-slate-100 ">
                    <td class="px-6 py-4 border-b border-slate-100">
                        <img :src="user.avatar ? ('storage/' + user.avatar) : 'storage/avatars/default-profile-cat.jpg'"
                            alt="" class="w-8 h-8 rounded-full overflow-hidden object-center object-cover">
                    </td>
                    <td class="px-6 py-4 border-b border-slate-100">{{user.name}}</td>
                    <td class="px-6 py-4 border-b border-slate-100">{{user.email}}</td>
                    <td class="px-6 py-4 border-b border-slate-100">{{ getDate(user.created_at)}}</td>
                </tr>
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div>
            <PaginationsLinks :paginator="users" />
        </div>
    </div>
</template>
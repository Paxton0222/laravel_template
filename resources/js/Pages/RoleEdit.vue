<script lang="ts" setup>
import BaseLayout from "@/Layouts/BaseLayout.vue"
import { PageResponseWithData, PageSearch } from "@/types/pagination"
import { Head } from "@inertiajs/vue3"
import { Role } from "@/types/model"
import PaginateTable from "@/Components/Table/PaginateTable.vue"
import { onMounted, Ref, ref } from "vue"
import DangerButton from "@/Components/Button/DangerButton.vue"
import Checkbox from "@/Components/Form/Components/Checkbox.vue"
import SearchInput from "@/Components/Table/SearchInput.vue"
import SortThead from "@/Components/Table/SortThead.vue"
import { useSearchInput, useSortThead } from "@/pagination"

const props = defineProps<PageResponseWithData<Role>>()
const routes = {
    create: "role.create",
    update: "role.update",
    delete: "role.delete",
    deleteMulti: "api.role.delete",
}
const forms = {
    create: {
        name: "",
    },
    update: {
        id: undefined,
    },
    delete: {
        id: undefined,
    },
}
const deleteBy = ["id"]

const table = ref<InstanceType<typeof PaginateTable> | null>(null)

const {
    search: searchId,
    searchInputElement: searchIdInputElement,
    setQuery: setQueryId,
} = useSearchInput(table, "id")
const { sort: sortId, useSetSort: useSetIdSort } = useSortThead(table, "id")
</script>
<template>
    <BaseLayout>
        <template #header>
            <Head title="Role列表" />
        </template>
        <div class="h-full p-8 bg-base-200 rounded-xl">
            <PaginateTable
                ref="table"
                :page-props="props"
                :routes="routes"
                :forms="forms"
                :delete-by="deleteBy"
            >
                <template #table-header-left-custom>
                    <!-- 這裡顯示欄位搜尋input，可複製修改，有要填寫的地方會標注像這樣 -> ** 標註 ** -->
                    <SearchInput
                        ref="searchIdInputElement"
                        v-model="searchId"
                        type="number"
                        min="1"
                        placeholder="搜尋 ID"
                        column="id"
                        operator="="
                        @keydown.enter="setQueryId"
                    />
                    <!--
                    <SearchInput
                        ref="** custom search ref **"
                        v-model="** custom search v-model **"
                        type="** custom type (string, number, etc...) **"
                        placeholder="搜尋 ** custom column placeholder **"
                        column="** custom column **"
                        operator="="
                        @keydown.enter="** custom execute function **"
                    />
                    -->
                </template>
                <template #thead>
                    <!-- 這裡顯示欄位名稱資料，有要填寫的地方會標注像這樣 -> ** 標註 ** -->
                    <SortThead column="id" v-model="sortId" @update-status="useSetIdSort">ID</SortThead>
                    <!--
                    <th>
                        Role (**填寫上欄位名稱**) &nbsp;
                        <span class="badge badge-neutral badge-sm"
                            >雙擊文字編輯</span
                        >
                    </th>
                    -->
                    <th>操作</th>
                </template>
                <template
                    #tbody="{
                        form,
                        index,
                        checkboxes,
                        update_submit,
                        delete_modal,
                        delete_set_data,
                    }"
                >
                    <!-- 這裡顯示欄位資料，有要填寫的地方會標注像這樣 -> ** 標註 ** -->
                    <th>
                        <label>
                            <Checkbox
                                v-model="checkboxes[index]"
                                :checked="checkboxes[index]"
                            />
                        </label>
                    </th>
                    <td>{{ form.id }}</td>
                    <!-- 自定義欄位模板，可複製修改，有要填寫的地方會標注像這樣 -> ** 標註 ** -->
                    <!--
                    <td>

                        <TableEditText
                            v-model="form.**填寫上欄位**"
                            class="w-full"
                            @input-updated="update_submit(form)"
                        />
                    </td>
                    -->
                    <td>
                        <DangerButton
                            class="btn-outline btn-sm"
                            @click="
                                delete_modal?.modal?.showModal(),
                                    delete_set_data(form)
                            "
                        >
                            刪除
                        </DangerButton>
                    </td>
                </template>
                <template #createModalTitle> 建立Role </template>
                <template #createModalForm="{ form }">
                    <!-- 自定義欄位模板，可複製修改，有要填寫的地方會標注像這樣 -> ** 標註 ** -->
                    <!--
                    <InputLabel for="** 填寫上欄位ID **" value="** 填寫上欄位名稱 **" />
                    <Input
                        id="** 填寫上欄位ID (要和 label 一樣) **"
                        v-model="form.** 填寫上欄位 **!"
                        class="mt-1 block input input-bordered w-full"
                        :class="[
                            {
                                'input-error': form.errors.** 填寫上欄位 **,
                            },
                        ]"
                        @keydown.enter="form.submit"
                    />
                    <InputError
                        :message="
                            computed(() => {
                                return errorMessageTransform(form.errors.** 填寫上欄位 **!)
                            })
                        "
                        class="mt-2"
                    />
                    -->
                </template>
                <template #deleteModalTitle="{ form }">
                    確定要刪除RoleID: {{ form.id }}?
                </template>
                <template #deleteMultiModalTitle>
                    確定要刪除所選的全部Role?
                </template>
            </PaginateTable>
        </div>
    </BaseLayout>
</template>

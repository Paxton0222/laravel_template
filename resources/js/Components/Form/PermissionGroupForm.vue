<script setup lang="ts">
import Checkbox from "@/Components/Form/Components/Checkbox.vue"
import { PermissionGroup } from "@/types/model"
import MultiCheckbox from "@/Components/Form/Components/MultiCheckbox.vue"

const props = withDefaults(
    defineProps<{
        permission_groups: PermissionGroup[]
        perm_ids: Array<number>
    }>(),
    {
        perm_ids: []
    }
)

const emit = defineEmits([
    "perm_ids",
])
</script>

<template>
    <template v-for="group in props.permission_groups">
        <tr>
            <td>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text">{{ group.group.name }}</span>
                        <MultiCheckbox />
                    </label>
                </div>
            </td>
            <td>
                <template v-for="permission in group.permissions">
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">{{ permission.name }}</span>
                            <Checkbox v-model="permission.checked" />
                        </label>
                    </div>
                </template>
            </td>
        </tr>
    </template>
</template>

<style scoped>

</style>


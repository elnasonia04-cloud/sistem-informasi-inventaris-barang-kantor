<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard Inventaris" />

    <AuthenticatedLayout>
        <div class="min-h-screen bg-gray-100">

            <div class="flex min-h-screen">

                <!-- Sidebar sebelah kiri -->
                <aside class="w-64 bg-blue-900 text-white p-5">
                    <h2 class="text-xl font-bold mb-2">
                        Inventaris Kantor
                    </h2>

                    <p class="text-sm text-blue-200 mb-8">
                        Sistem Informasi Barang
                    </p>

                    <nav class="space-y-3">
                        <!-- Menu Dashboard -->
                        <Link
                            href="/dashboard"
                            class="block rounded-lg bg-blue-700 px-4 py-3 hover:bg-blue-600"
                        >
                            Dashboard
                        </Link>

                        <!-- Menu Data Barang -->
                        <Link
                            href="/barang"
                            class="block rounded-lg px-4 py-3 hover:bg-blue-700"
                        >
                            Data Barang
                        </Link>
                    </nav>
                </aside>

                <!-- Bagian isi dashboard -->
                <main class="flex-1 p-8">

                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        Dashboard Inventaris
                    </h1>

                    <p class="text-gray-600 mb-8">
                        Selamat datang di Sistem Informasi Inventaris Barang Kantor.
                    </p>

                    <!-- Kartu informasi -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">
                                Data Barang
                            </h3>

                            <p class="text-gray-600 mb-4">
                                Lihat dan kelola data inventaris barang kantor.
                            </p>

                            <Link
                                href="/barang"
                                class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                            >
                                Buka Data Barang
                            </Link>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">
                                Pengelolaan Inventaris
                            </h3>

                            <p class="text-gray-600">
                                Gunakan menu Data Barang untuk menambah,
                                melihat, mengedit, menghapus, dan mencari
                                barang inventaris.
                            </p>
                        </div>

                    </div>

                </main>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

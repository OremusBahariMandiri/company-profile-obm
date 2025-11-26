<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class StorageHelper
{
    /**
     * Get storage path (selalu menggunakan public/uploads)
     */
    public static function getStoragePath($path = '')
    {
        // Semua file disimpan di public/uploads untuk menghindari symbolic link
        return public_path('uploads/' . ltrim($path, '/'));
    }

    /**
     * Get URL untuk mengakses file (konsisten untuk semua environment)
     */
    public static function getStorageUrl($path)
    {
        // Gunakan asset() untuk semua environment
        return asset('uploads/' . ltrim($path, '/'));
    }

    /**
     * Store file dengan handling environment otomatis
     */
    public static function storeFile(UploadedFile $file, $folder = '', $filename = null)
    {
        // Generate filename jika tidak disediakan
        if (!$filename) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        }

        $path = $folder ? $folder . '/' . $filename : $filename;

        // Simpan langsung ke public/uploads untuk semua environment
        $destinationPath = public_path('uploads/' . $folder);

        // Buat folder jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        return $path;
    }

    /**
     * Delete file (konsisten untuk semua environment)
     */
    public static function deleteFile($path)
    {
        if (empty($path)) {
            return false;
        }

        // Hapus dari public/uploads untuk semua environment
        $fullPath = public_path('uploads/' . ltrim($path, '/'));
        if (file_exists($fullPath)) {
            unlink($fullPath);
            return true;
        }

        return false;
    }

    /**
     * Check apakah file exists (konsisten untuk semua environment)
     */
    public static function fileExists($path)
    {
        if (empty($path)) {
            return false;
        }

        // Check di public/uploads untuk semua environment
        return file_exists(public_path('uploads/' . ltrim($path, '/')));
    }

    /**
     * Get file size (konsisten untuk semua environment)
     */
    public static function getFileSize($path)
    {
        if (empty($path)) {
            return 0;
        }

        // Check di public/uploads untuk semua environment
        $fullPath = public_path('uploads/' . ltrim($path, '/'));
        return file_exists($fullPath) ? filesize($fullPath) : 0;
    }
}
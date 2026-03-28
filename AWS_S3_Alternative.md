# AWS S3 Alternative Configuration

## 1. Install AWS S3 Package
```bash
composer require league/flysystem-aws-s3-v3
```

## 2. Update .env with S3 Credentials
```bash
# AWS S3 Configuration
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket-name
AWS_URL=https://your-bucket-name.s3.amazonaws.com
AWS_ENDPOINT=https://s3.amazonaws.com
```

## 3. Update config/filesystems.php
```php
'disks' => [
    // ... existing disks ...

    's3' => [
        'driver' => 's3',
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION'),
        'bucket' => env('AWS_BUCKET'),
        'url' => env('AWS_URL'),
        'endpoint' => env('AWS_ENDPOINT'),
        'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        'throw' => false,
    ],
],
```

## 4. Update Default Disk
```php
'default' => env('APP_ENV') === 'production' ? 's3' : 'public',
```

## 5. Update Filament FileUpload
```php
Forms\Components\FileUpload::make('image')
    ->disk(env('APP_ENV') === 'production' ? 's3' : 'public')
    ->directory('categories')
    ->visibility('public')
    // ... other config
```

## 6. Update ImageColumn
```php
Tables\Columns\ImageColumn::make('image')
    ->disk(env('APP_ENV') === 'production' ? 's3' : 'public')
    ->url(fn ($record) => {
        if (!$record->image) return null;
        
        if (app()->environment('production')) {
            // S3 URL
            return Storage::disk('s3')->url($record->image);
        }
        
        return asset('storage/' . $record->image);
    })
    // ... other config
```

## 7. Update Helper Function
```php
function getImageUrl($imagePath)
{
    if (!$imagePath) return null;
    
    if (app()->environment('production')) {
        return Storage::disk('s3')->url($imagePath);
    }
    
    return asset('storage/' . $imagePath);
}
```

## Benefits of S3 over Cloudinary:
- ✅ More control over files
- ✅ Cheaper for large volumes
- ✅ Direct file management
- ✅ Better for documents/files
- ✅ AWS ecosystem integration

## Benefits of Cloudinary over S3:
- ✅ Built-in image optimization
- ✅ Automatic transformations
- ✅ CDN included
- ✅ Better for images specifically
- ✅ Easier setup

# Fix: Update composer.lock for Razorpay

## Problem
`composer.json` has razorpay/razorpay but `composer.lock` is missing it.
This causes Docker build to fail: "Required package razorpay/razorpay is not present in the lock file"

## Solution

You MUST run this on your LOCAL machine (not on Render):

### Step 1: Install Composer locally
If you don't have Composer installed:
- Download: https://getcomposer.org/download/
- Or use: https://php.new (Laravel Herd includes Composer)

### Step 2: Run this command in project folder

Open terminal/command prompt in your project folder:

```bash
cd e:\radhe-shop\radhe-shop

# This updates BOTH composer.json and composer.lock
composer require razorpay/razorpay:^2.9

# OR if you want to update without changing version constraints:
composer update razorpay/razorpay
```

### Step 3: Verify lock file was updated

Check if composer.lock now contains razorpay:
```bash
grep -i razorpay composer.lock
```

You should see razorpay entries in the output.

### Step 4: Commit both files

```bash
git add composer.json composer.lock
git commit -m "Add Razorpay SDK - update composer.lock"
git push origin main
```

### Step 5: Deploy to Render

Render will automatically deploy when you push, or click "Manual Deploy" in dashboard.

---

## Why This Happens

- `composer.json` = tells WHAT packages you need
- `composer.lock` = tells EXACT version of each package
- Docker runs `composer install` which reads from `composer.lock`
- If razorpay isn't in lock file, install fails

---

## Alternative: Delete composer.lock

If you can't run composer locally:

```bash
# Delete lock file
del composer.lock

# Commit deletion
git rm composer.lock
git commit -m "Remove composer.lock for regeneration"
git push origin main
```

Then on Render, the Docker build will generate a new lock file. **Not recommended** but works.

---

## Checklist Before Pushing

- [ ] Run `composer require razorpay/razorpay:^2.9` locally
- [ ] Verify `composer.lock` has razorpay entries
- [ ] Commit BOTH `composer.json` and `composer.lock`
- [ ] Push to git
- [ ] Verify Render deployment succeeds

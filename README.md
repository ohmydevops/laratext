<div dir='rtl'>

# LaraText | لاراتکست

این پروژه با اهداف آموزشی برای [بوت‌کمپ داکر هلدینگ گرین‌وب](https://evnd.co/l2PJx) ایجاد شده است.
به‌وسیله این پروژه میتوانید تصاویر دارای متون فارسی/انگلیسی را به کمک موتور OCR به نام [Tesseract](https://google.com)  به رشته متنی تبدیل کنید.


نحوه استفاده از پروژه در حالت غیر داکری:

</div>

```bash
git clone https://github.com/amirbagh75/laratext laratext
cd laratext
composer install
php8.0 artisan laratext:convert
```

<div dir='rtl'>

با زدن دستور بالا، آدرس تصویر را از شما میپرسد که کافیست آدرس مطلق فایل را به آن پاس دهید و منتظر چاپ رشته متنی باشید.

نحوه استفاده از پروژه در حالت داکری:
 
</div>

```bash
git clone https://github.com/amirbagh75/laratext laratext
cd laratext
docker build -t laratext -f Dockerfile-cli .
docker run --name laratext --interactive --tty --rm laratext
```

<div dir='rtl'>

همچنین میتوانید پروژه را به صورت مستقیم از داکر‌هاب نیز دریافت و اجرا کنید:

</div>

```bash
docker run --name laratext -it --rm amirbagh75/laratext 
```

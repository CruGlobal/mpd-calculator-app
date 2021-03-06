FROM cruglobal/base-image-php:latest
MAINTAINER cru.org <apps@cru.org>

# Nginx is pointed at /var/www/app as document root
# App is installed at /home/app/webapp

# Copy source
COPY . /home/app/webapp

# Install PHP dependencies
RUN composer install --no-dev

# Install Node dependencies, Bower dependencies and build with gulp
RUN set -x \
	&& cd app \
	&& npm install \
	&& bower --allow-root install \
	&& ./node_modules/.bin/gulp build \
	&& cd ..

# Copy post-deploy scripts
RUN mkdir -p /home/app/bin
COPY docker/post-deploy.sh /home/app/bin/
COPY docker/supervisord-post-deploy.conf /etc/supervisor/conf.d/


workers Integer(ENV['PUMA_WORKERS'] || 3)
threads Integer(ENV['MIN_THREADS']  || 1), Integer(ENV['MAX_THREADS'] || 16)

port        ENV['PORT']     || 3000
environment ENV['RACK_ENV'] || 'development'

app_dir = '/usr/share/webapps/site'
directory app_dir
rackup "#{app_dir}/config.ru"

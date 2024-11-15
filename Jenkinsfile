pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'laravel-sig-app'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/rezadika11/sig-parkir' 
            }
        }        
        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${DOCKER_IMAGE}", ".").inside {
                        sh 'composer install --no-interaction --prefer-dist'
                    }
                }
            }
        }
        
        stage('Run Tests') {
            steps {
                script {pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'laravel-sig-app'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/rezadika11/sig-parkir' 
            }
        }        
        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${DOCKER_IMAGE}", ".") // Build Docker image
                }
            }
        }
        
        stage('Run Tests') {
            steps {
                script {
                    docker.image("${DOCKER_IMAGE}").inside {
                        sh '''
                            cd /var/www
                            composer install --no-interaction --prefer-dist
                            vendor/bin/phpunit
                        '''
                    }
                }
            }
        }
        
        stage('Deploy to Production') {
            steps {
                echo 'Deploying to production...'
                script {
                    sh '''
                        docker-compose -f docker-compose.prod.yml up -d
                    '''
                }
            }
        }
    }

    post {
        always {
            cleanWs()
        }
    }
}

                    
                    docker.image("${DOCKER_IMAGE}").inside {
                        sh 'cd /var/www && vendor/bin/phpunit'
                    }
                }
            }
        }
        
        stage('Deploy to Production') {
            steps {
                
                echo 'Deploying to production...'
            }
        }
    }

    post {
        always {
            
            cleanWs()
        }
    }
}

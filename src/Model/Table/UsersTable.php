<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->hasOne('user_details');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notBlank('first_name')
            ->notEmptyString('first_name', 'Please enter your First Name')
            ->add('first_name', [

                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
            ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notBlank('last_name')
            ->notEmptyString('last_name', 'Please enter your Last Name')
            ->add('last_name', [

                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
            ]);
        $validator
            ->scalar('phone')
            ->maxLength('phone', 50)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone', 'Please enter your Phone nunber')
            ->add('phone', [

                'number' => [
                    'rule'    => ['custom', '/^[0-9]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter numbers only.'
                ],
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'message' => 'Phone Number need to be 10 characters long',
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'message' => 'Phone Number need to be 10 characters long',
                ]
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'Please enter your Email')
            ->add('email', [
                [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email already exist please enter another Email',
                ],

            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->requirePresence('password', 'create')
            ->notEmptyString('password', 'Please enter your Password')
            ->add('password', [

                'characters' => [
                    'rule'    => ['custom', '/^(?=.*?[A-Z])(?=.*?[\W]).{8,}$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter a 8 character alphanumaric password.
                    Having atleast one upper and one lower case character and one special character.,
                    For example: Test@123',
                ],
            ]);

        $validator

            ->scalar('confirm_password')
            ->maxLength('confirm_password', 50)
            ->requirePresence('confirm_password', 'create')
            ->notEmptyString('confirm_password', 'Please enter your confirm_password')
            ->add('confirm_password', [

                'characters' => [
                    'rule'    => ['custom', '/^(?=.*?[A-Z])(?=.*?[\W]).{8,}$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter a 8 character alphanumaric password.
                    Having atleast one upper and one lower case character and one special character.,
                    For example: Test@123',
                ],

            ])
            ->add('confirm_password', [
                'match' => [
                    'rule' => ['compareWith', 'password'],
                    'message' => 'Passwords do not match'
                ]
            ]);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 50)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender', 'Please select your Gender');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}

<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserDetails Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserDetail newEmptyEntity()
 * @method \App\Model\Entity\UserDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UserDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UserDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserDetailsTable extends Table
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

        $this->setTable('user_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');


        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('users_id')
            ->notEmptyString('users_id');

        $validator
            ->scalar('address')
            ->maxLength('address', 155)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('bank')
            ->requirePresence('bank', 'create')
            ->notEmptyString('bank');



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
        $rules->add($rules->existsIn('users_id', 'Users'), ['errorField' => 'users_id']);

        return $rules;
    }
}

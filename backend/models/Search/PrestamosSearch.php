<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestamos;

/**
 * PrestamosSearch represents the model behind the search form about `app\models\Prestamos`.
 */
class PrestamosSearch extends Prestamos
{
//    public $nombreLibro;
//    public $nombreCliente;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idLibro', 'idCliente'], 'integer'],
            [['nombreLibro','status','nombreCliente'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Prestamos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idLibro' => $this->idLibro,
            'idCliente' => $this->idCliente,
            'fechaPrestamo' => $this->fechaPrestamo,
        ]);

        return $dataProvider;
    }
    #<!- funcion para ver las devoluciones->
        public function prestados($params)
    {
        $query = Prestamos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->select(['idLibro as id','libros.nombre as nombreLibro','status','clientes.nombre as nombreCliente'])->innerJoin('libros','libros.id=prestamos.idLibro')->innerJoin('clientes','clientes.id=prestamos.idcliente')->andFilterWhere([
            'id' => $this->id,
            'idLibro' => $this->idLibro,
            'nombreLibro' => $this->nombreLibro,
            'idCliente' => $this->idCliente,
            'fechaPrestamo' => $this->fechaPrestamo,
            'status'=>'Prestado',
            'nombreCliente' => $this->nombreCliente
        ]);

        return $dataProvider;
    }
    
}
